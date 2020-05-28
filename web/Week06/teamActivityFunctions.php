<?php
function insertTopic()
{
    include('../../db/connectToDb.php');

    // get the data from the POST
    $book = $_POST['txtBook'];
    $chapter = $_POST['txtChapter'];
    $verse = $_POST['txtVerse'];
    $content = $_POST['txtContent'];
    $topicIds = $_POST['chkTopics'];

    // For debugging purposes, you might include some echo statements like this
    // and then not automatically redirect until you have everything working.

    echo "book=$book\n";
    echo "chapter=$chapter\n";
    echo "verse=$verse\n";
    echo "content=$content\n";

    // we could (and should!) put additional checks here to verify that all this data is actually provided

    try {
        // Add the Scripture

        // We do this by preparing the query with placeholder values
        $query = 'INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
        $statement = $db->prepare($query);

        // Now we bind the values to the placeholders. This does some nice things
        // including sanitizing the input with regard to sql commands.
        $statement->bindValue(':book', $book);
        $statement->bindValue(':chapter', $chapter);
        $statement->bindValue(':verse', $verse);
        $statement->bindValue(':content', $content);

        $statement->execute();

        // get the new id
        $scriptureId = $db->lastInsertId("scripture_id_seq");

        if (isset($_POST['addNewTopic'])) {
            // Get the topic name
            $topicName = $_POST['newTopic'];

            $query = 'INSERT INTO topic(name) VALUES(:name)';
            $statement = $db->prepare($query);

            $statement->bindValue(':name', $topicName);

            $statement->execute();

            $topicId = $db->lastInsertId("topic_id_seq");

            // Now add that topic to the array of topics as we are assuming the user wants to add that topic to this scripture
            array_push($topicIds, $topicId);
        }

        // Now go through each topic id in the list from the user's checkboxes
        foreach ($topicIds as $topicId) {
            echo "ScriptureId: $scriptureId, topicId: $topicId";

            // Again, first prepare the statement
            $statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

            // Then, bind the values
            $statement->bindValue(':scriptureId', $scriptureId);
            $statement->bindValue(':topicId', $topicId);

            $statement->execute();
        }
    } catch (Exception $ex) {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }

    header("Location: topicEntry.php");

    die(); // we always include a die after redirects. In this case, there would be no
    // harm if the user got the rest of the page, because there is nothing else
    // but in general, there could be things after here that we don't want them
    // to see.
}

function showTopics()
{
    include('../../db/connectToDb.php');
    try {
        // For this example, we are going to make a call to the DB to get the scriptures
        // and then for each one, make a separate call to get its topics.
        // This could be done with a single query (and then more processing of the resultset
        // afterward) as follows:

        //	$statement = $db->prepare('SELECT book, chapter, verse, content, t.name FROM scripture s'
        //	. ' INNER JOIN scripture_topic st ON s.id = st.scriptureId'
        //	. ' INNER JOIN topic t ON st.topicId = t.id');


        // prepare the statement
        $statement = $db->prepare('SELECT id, book, chapter, verse, content FROM scripture');
        $statement->execute();

        // Go through each result
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>';
            echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
            echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
            echo '<br />';
            echo 'Topics: ';

            // get the topics now for this scripture
            $stmtTopics = $db->prepare('SELECT name FROM topic t'
                . ' INNER JOIN scripture_topic st ON st.topicId = t.id'
                . ' WHERE st.scriptureId = :scriptureId');

            $stmtTopics->bindValue(':scriptureId', $row['id']);
            $stmtTopics->execute();

            // Go through each topic in the result
            while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC)) {
                echo $topicRow['name'] . ' ';
            }

            echo '</p>';
        }
    } catch (PDOException $ex) {
        echo "Error with DB. Details: $ex";
        die();
    }
}
