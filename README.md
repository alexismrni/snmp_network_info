# snmp_network_info Nagios Plugin
## Check to getting informations about Cisco, Fortinet & PaloAlto Equipments for EyesOfNetwork. Not tested with other brands.

### Don't try to use the .SH file. Use only the .php file.

You can get informations from a Network Equipment (Like Model, Version and Serial Number).
My script always returns informations. Works also if the equipment is down. (It keeps in memory)
If there are changes, my script compare before and now and returns the difference with a Warning Status Code.


<b>USAGE for EYES OF NETWORK: </b>
`php $USER1$/snmp_network_info.php $HOSTADDRESS$ $USER2$ 240000`

240000 corresponds to time to returns warning if there are changes

![Real Exemple](https://i.imgur.com/OMiEaTh.png)

Big thanks to <a href="https://github.com/maubertin">@maubertin</a> for his help and <a href="https://github.com/joubbi">@joubbi</a> for the <a href="https://github.com/joubbi/snmp_cisco_info">initial SNMP script</a>.

Writted by Alexis for Axians. If you need help only with the PHP script, you can contact me by email to alexis.meroni@axians.com
