const http = require('http');
const https = require('https');
const url = require('url');

const server = http.createServer(onRequest);
server.listen(8888);

function onRequest(req, res) {
    const query = url.parse(req.url, true);
    if (query.pathname === '/home') {
        res.writeHead(200, {
            "Content-Type": "text/html",
        });
        res.write('<h1>Welcome to the Home Page</h1>');
        res.end();
    } else if (query.pathname === '/getData') {
        res.writeHead(200, {
            "Content-Type": "application/json"
        });
        res.write(JSON.stringify({
            'name': 'Jeremy Griffiths',
            'class': 'cse341'
        }));
        res.end();
    } else if (query.pathname === '/getApiData') {
        const request = require('request');

        request('https://lozapi.glitch.me/games/', {
            json: true
        }, (error, response, body) => {
            if (error) {
                return console.log(err);
            }

            res.writeHead(200, {
                "Content-Type": "text/html",
            });

            res.write('<h1>Legend of Zelda Game titles</h1>');

            for (i in body.results) {
                res.write('<h3>' + body.results[i].title + '</h3>');
            }
            res.end();
        });
    } else {
        res.writeHead(404, {
            "Content-Type": "text/html"
        });
        res.write('Page Not Found');
        res.end();
    }
}