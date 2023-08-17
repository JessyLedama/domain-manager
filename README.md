## About Domain Manager

This domain manager is a solution for people who manage multiple domains in a linux environment. If you manage mulitple domains, this solution is to automate some of your tasks as follows:

- You create a domain.
- The system creates a sites-available (/etc/apache2/sites-available/domain.conf) file for you (reverse proxy)
- The system creates a service (/etc/systemd/system/domain.service).

Once these tasks have been completed, you can proceed to certbot to create your ssl certificates.

## Why Domain Manager

The domain manager keeps a list of your domains in the database. As such, should any file be deleted, the system will automatically recreate the file.
This should ensure that all your domains run smoothly.

## From The Author

This domain manager was developed by [Jessy Ledama](https://github.com/JessyLedama) as an open source solution. You are free to use it as you please.

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Jessy Ledama via [sirjayliste@gmail.com](mailto:sirjayliste@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Domain Manager is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
