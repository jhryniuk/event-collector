# Event collector

My first attempt to write application in `onion architecture`

#### Download project:
* `git clone https://github.com/jhryniuk/event-collector.git`
* `cd event-collector`
* `composer install`

#### Run project:
* `bin/console server:start --docroot=public`
* website will be available on address `localhost:8000`

#### Stop project: 
* `bin/console service:stop`

#### Run tests:
* `bin/phpspec -run`