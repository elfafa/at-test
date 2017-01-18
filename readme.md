# Installation to test it

## Get local version

First of all, get the current source code on your machine.

```
git clone git@github.com:elfafa/at-test.git activeticketing
```

## Vagrant

To easily install and test the store, with no compatibility problem, use a Virtual Machine, thanks to Vagrant.

* Get [Vagrant](https://www.vagrantup.com/) and install it
* Go to the main repository of your local source code
* Start the VM : `vagrant up`

## Update your local DNS

Add the following line into your `/etc/hosts` file

```
192.168.56.101 activeticketing.dev
```

## Initialization of database

Access to the VM

```
vagrant ssh
```

On the VM, go to the repository an launch migrations/seeds commands

```
cd /var/www/
php artisan migrate:refresh --seed
```

# Test it

* Website url : activeticketing.dev
* Login/Password : test@activeticketing.com/secret

If you want to erase database and restart your tests from scratch, just relaunch the migrations/seeds commands