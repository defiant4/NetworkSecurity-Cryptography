# NetworkSecurity-Cryptography

The project is an implementation of Non-Interactive Verifiable Secret Sharing improvements using Shamir’s Secret Sharing Protocol for key exchange and management.

## Getting Started

Laravel is used as the main framework in which both back end and front end are designed and implemented. Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications.

The implementation of the scheme is coded using PHP while Laravel acts a web framework to create a front end.


### Prerequisites

Kindly use HTML,CSS, MYSQL, Apache2, PHP, Laravel Framework 5.4 and above to run this project.

### Break down into end to end tests

The dealer generates a secret key, encrypts it and sends it across a network. He has a database of all the clients that are able to accessthe network. 
If a client wants to access the secret, he will have to verify his share first (This is done using the Diffie-Hellman scheme).
After doing so, the secret will be decrypted and revealed to them.
We are using the principle of asymmetric encryption scheme for accessibility of the secret. 
The system implements a non-interactive VSS protocol since the dealer is the only one who can send any messages and the clients cannot interact with each other or the dealer.


### And coding style tests

The raw java file has also been provided for the actual logic before the production deployment of the project.

## Contributing

Currently contribution is not allowed. For pull/push request contact me personally.

## Versioning

There is only 1 active version of this project.

## Authors

* **Arnab Adhikari** - *Initial work*

## License

This project is currently not licensed and is free to use subject to clearance from the author.

## Acknowledgments

* Hat tip to Mr. Anup Kumar Bid for his support.
