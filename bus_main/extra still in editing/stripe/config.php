curl -v POST https://api-m.sandbox.paypal.com/v1/oauth2/token \
  -H "Accept: application/json" \
  -H "Accept-Language: en_US" \
  -u "AYYYm0MX7D69Jehtq6PQU_fDCYjANg8AosvZx4UbvHo0PoYk8Orh0iQGqPaypnNv6hDbfZUpUJHHcCEt:EKzEzfHtOMaCeC3Ble6ntlMZvHaRJ5Fv7UbjhLEwMVKF4MXDSk-tLqkomMsnV7hAKvkDLOpIym7iZhLN" \
  -d "grant_type=client_credentials"