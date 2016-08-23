import os

#
# The goal of this script is to read localization data from a PostgreSQL database
# and generate the needed localization string files for the project.
#

class LocalizationFile:

	def __init__ (self, table_column_index, language_code):
		self.table_column_index = table_column_index
		self.output_path = "messages/"+language_code+"/app.php"
		self.file_object = open(self.output_path, 'w')

	def write_line(self, line):
		self.file_object.write(line)


class Localization:

	# Class constants
	OUTPUT_FILE = "samurai_meetups.sql"
	HEADER = "<?php \n\t/* This file was generated using the localization script. Please do not make any changes to this file. */\n\n\treturn [\n"

	# Database constants
	DATABASE_NAME = "samurai_meetups"
	USERNAME = "root"
	TABLE_NAME = "localization"

	# Localization constants
	LOCALIZATION_FILE_MARKER = "INSERT INTO `localization`"
	LOCALIZATION_FILE_ENDER = "\.\n"

	def __init__ (self, localization_file):
		print "[Internal] Initialized Localization class"
		self.localization_file = localization_file

	# Accesses the budget_bunny database and exports an SQL file
	def database_dump(self):
		print "[Status] Running database dump"

		dump_command = "mysqldump -u "+self.USERNAME+" -p "+self.DATABASE_NAME+" "+self.TABLE_NAME+" > "+self.OUTPUT_FILE
		os.popen(dump_command)
		print "[Status] Database dump complete: "+self.OUTPUT_FILE

	# Creates the localization strings
	def create_localization_file(self):
		print "[Status] Checking database dump file"

		file = open(self.OUTPUT_FILE)
		line = self.find_localization_portion(file)

		line = line.replace("\\\\n", "\\n")
		localization_items = line.split("),(")
		i = 0

		self.localization_file.write_line(self.HEADER)
		for item in localization_items:
			if i == 0:
				temp_item = item.split(" (")
				item  = temp_item[1]
			elif i == len(localization_items)-1:
				temp_item = item.split(")")
				item  = temp_item[0]
			elements = item.split(",")
			english_key = elements[1]
			localization_key = elements[self.localization_file.table_column_index]

			self.localization_file.write_line("\t\t"+english_key+" => "+localization_key+",\n")
			i+=1

		self.localization_file.write_line("\t];\n")
		print "[Status] Finished"

	def find_localization_portion(self, file):
		line = file.readline()

		while not self.LOCALIZATION_FILE_MARKER in line:
			line = file.readline()

		return line

if __name__ == "__main__":

	ja_local = LocalizationFile(table_column_index = 2, language_code = "ja")

	localization = Localization(ja_local)
	localization.database_dump()
	localization.create_localization_file()





