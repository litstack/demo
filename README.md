<p align="center">
    <img width="350px" style="max-width:100%;" src="https://raw.githubusercontent.com/litstack/art/master/logo/png/litstack_logo.png">
</p>

# Litstack Demo

A demo application to illustrate how litstack works. The online version can be found under [demo.litstack.io](https://demo.litstack.io).

## Installation

Clone the repository:

```shell
git clone https://github.com/litstack/demo.git && cd demo
```

Copy the `.env.example` file:

```shell
cp .env.example .env
```

Setup a connection to an existing database and run the seeder via artisan:

```shell
php artisan demo:install
```
