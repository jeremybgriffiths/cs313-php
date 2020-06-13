const http = require('http');

const server = http.createServer(onRequest);
server.listen(8888);

function onRequest(req, res) {
    if (req.url === '/home') {
        res.writeHead(200, {
            "Content-Type": "text/html",
        });
        res.write('<h1>Welcome to the Home Page</h1>');
        res.end();
    } else if (req.url === '/getData') {
        res.writeHead(200, {
            "Content-Type": "application/json"
        });
        res.write(JSON.stringify({
            'name': 'Jeremy Griffiths',
            'class': 'cse341'
        }));
        res.end();
    } else {
        res.writeHead(404, {
            "Content-Type": "text/html"
        });
        res.write('Page Not Found');
        res.end();
    }
}