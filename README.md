## About Domain Manager

This domain manager is a solution for people who manage multiple domains in a linux environment. After installation, this system will help to automate some of your tasks as follows:

- Suppose you just built your project and deployed it. Your project is now ready for launch, but it is currently running on ```192.168.123.456:8000``` but you want it accessible through ```example.com```. Lucky for you, you have this domain manager up and running. 

- You log into the system and create a domain called ```example.com``` and its proxy you set as ```192.168.123.456:8000```. Having done that, you open a new tab and go to example.com, and voila! Your project is ready for launch!

- When you create a domain in the system, a reverse proxy and a service file will be created automatically for the domain. Therefore, if your project is running on ```192.168.123.456:8000``` and you have created its domain as ```example.com```, you will now be able to access the it through example.com

## How To Install
This project was built using Laravel 10. Therefore, you need to have composer in your environment. If you do not have composer installed read here for more information about [composer](https://getcomposer.org/doc/00-intro.md).

You may clone this project on github directly or using composer
```composer create-project jessyledama/domain-manager```

Once the installation process is complete, you may cd into your project
```cd domain-manager```

Migrate your database
``` php artisan migrate ```

Seed test data
``` php artisan db:seed ```

Start the project
``` php artisan serve ```

Once the system runs, it will be available on ```localhost:8000``` or as displayed in the terminal.

## Setting Up Domains
Once your server is running, you can access it on the browser then follow the following steps:
- Log in
- Create a path for your proxy file (default is /etc/apache2/sites-available/domain.conf)
- Create a path for your service file (default is /etc/systemd/system/domain.service)
- Create a domain.
- The system creates a sites-available file (/etc/apache2/sites-available/domain.conf) aka reverse proxy.
- The system creates a service (/etc/systemd/system/domain.service).

Once these steps have been completed, your project is now accessible on domain.com and www.domain.com

## Why Domain Manager

This domain manager keeps a list of your domains in the database. As such, should any file be deleted, the system will automatically recreate the files.
This ensures that all your domains run smoothly.

## From The Author

This domain manager was developed and is maintained by [Jessy Ledama](https://github.com/JessyLedama) as a free open source solution. You are free to use it as you please.

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Jessy Ledama via [sirjayliste@gmail.com](mailto:sirjayliste@gmail.com). All security vulnerabilities will be promptly addressed.

## License

This Domain Manager is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
