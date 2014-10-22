#!/bin/sh
source /etc/profile
PID=`ps -ef | grep GearmanServer.php | grep -v grep | awk {'print $2'}`
kill $PID