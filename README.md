# Symfony Docker

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework, with full [HTTP/2](https://symfony.com/doc/current/weblink.html), HTTP/3 and HTTPS support.

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run ./build.sh  and wait until it finished
3. Open `http://localhost:8910` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
4. Webpage will be redirected to HTTP `https://localhost` (port 433)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Demo APP configuration

* Application consumes https://api.coindesk.com/v1/bpi/currentprice.json and shows EUR adn USD exchange rate fopr Bitcoin (BTC)
* API endpoint is stored in /src/config/services.yaml file as:
parameters:
`app.exchange_rates_url: "https://api.coindesk.com/v1/bpi/currentprice.json"`
* Application reload page every 15 seconds and get a new/actual exchange rate

## Features

* Production, development and CI ready
* [Installation of extra Docker Compose services](docs/extra-services.md) with Symfony Flex
* Automatic HTTPS (in dev and in prod!)
* HTTP/2, HTTP/3 and [Preload](https://symfony.com/doc/current/web_link.html) support
* Built-in [Mercure](https://symfony.com/doc/current/mercure.html) hub
* [Vulcain](https://vulcain.rocks) support
* Native [XDebug](docs/xdebug.md) integration
* Just 2 services (PHP FPM and Caddy server)

**Enjoy!**
## License

Symfony Docker is available under the MIT License.

## Credits

Created by [Saša Jovanović] (https://twitter.com/bastijan), based on git repo (https://github.com/dunglas/symfony-docker) by [Kévin Dunglas](https://dunglas.fr), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).
