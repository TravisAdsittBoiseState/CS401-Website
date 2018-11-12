if line.find('WSS') ==-1:
	if line.find('LINE') != -1 and len(x) >0:
		temp = 1
	if line.find('LINE') == -1 and line.find('None') == -1:
		line = line.split(':')
		
		x.append(float(line[0]))
		y.append(float(line[1]))
		z.append(float(line[2]))

