import base58
import sys

if __name__ == '__main__':
	if len(sys.argv) < 3:
		print("Please provide a filepath to store to and a private key in base58")
		exit()
		
	outfile = sys.argv[1]
	keyinB58 = sys.argv[2]
	byte_array = base58.b58decode(keyinB58)
	json_string = "[" + ",".join(map(lambda b: str(b), byte_array)) + "]"
	with open(outfile,"w") as f:
		f.write(json_string)
		f.close()
