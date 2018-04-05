# snmp_cisco_info Nagios Plugin
Check to getting informations about Cisco Equipments for EyesOfNetwork.

## Don't try to use the .SH file. Use only the .php file.</font

You can get informations from a Cisco Equipment (Like Model, Version and Serial Number).
My script always returns informations. Works also if the equipment is down. (It keeps in memory)
If there are changes, my script compare before and now and returns the difference with a Warning Status Code.


<b>USAGE for EYES OF NETWORK: </b>
`php $USER1$/snmp_cisco_info.php $HOSTADDRESS$ $USER2$ 240000`

240000 corresponds to time to returns warning if there are changes

Big thanks to <a href="https://github.com/maubertin">@maubertin</a> for his help and farid@joubbi.se for the initial SNMP script.
