#!/usr/bin/env python

import time
import serial

ser = serial.Serial(
	port='/dev/ttyUSB0'
	,baudrate=9600
	,parity=serial.PARITY_NONE
	,stopbits=serial.STOPBITS_ONE
	,bytesize=serial.EIGHTBITS
	,timeout=1
)

counter = 0

while 1:
	x = ser.write(':21111\r')	
	time.sleep(3)
	x = ser.write(':20000\r')
	x = ser.write(':21000\r')	
	time.sleep(3)
	
	x = ser.write(':20000\r')
	x = ser.write(':20100\r')	
	time.sleep(3)

	x = ser.write(':20000\r')
