# snmp_network_info Nagios Plugin
## Check to getting informations about Cisco, Fortinet & PaloAlto Equipments for EyesOfNetwork. Not tested with other brands.

### Don't try to use the .SH file. Use only the .php file.

You can get informations from a Network Equipment (Like Model, Version and Serial Number).
My script always returns informations. Works also if the equipment is down. (It keeps in memory)
If there are changes, my script compare before and now and returns the difference with a Warning Status Code.


<b>USAGE for EYES OF NETWORK: </b>
`php $USER1$/snmp_network_info.php $HOSTADDRESS$ $USER2$ 240000`

240000 corresponds to time to returns warning if there are changes

Big thanks to <a href="https://github.com/maubertin">@maubertin</a> for his help and farid@joubbi.se for the initial SNMP script.
