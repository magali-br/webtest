#!/usr/local/bin/python

#other places do not load NLTK  ( well same path with python2.7 works!!! )

# THIS PROGRAM MUST BE EXECUTED FROM OUTSIDE ITS PYTHON FOLDER 
#    AS python/ChomskySatzGenerator.py

import random
import nltk
from nltk.corpus import wordnet as wn
import subprocess

def php(script_path, word):
	#word = "'" + word + "'"
    p = subprocess.Popen(['php', script_path, word], stdout=subprocess.PIPE)
    result = p.communicate()[0]
    return result

def commonWord(word):
	cutoff = 5000000
	#print "word is " + word
	if word == '':
		return True

	#Also works
	result =  php("application/helpers/google_result_helper.php", word)

	# Somehow call controler + method - doesn't work
	#result =  php("welcome/googletest", word)

	result = result.replace(',','')
	if not result.isdigit():
		return False
	
	if int(result.replace(',', '')) > cutoff:
		return True
	else:
		return False



myNouns = ['salts', 'phones', 'hearts', 'ideas']
myArticles = ['', 'the', 'those', 'all', '', ''] 
myAdjectives = ['', 'green', 'twinkling', 'dark', 'happy', 'sad', \
	'rambuctious', 'peaceful', 'flabbergasted', 'unimpressed', 'colourless']
myVerbs = ['dance', 'fluctuate', 'sacrifice', 'return', 'sleep']
myAdverbs = ['crazily', 'airily', 'quickly', 'tearfully', 'furiously']\

verbs = []
nouns = []
adjectives = []
adverbs = []
articles = ['', 'the', 'those', 'all', '', ''] 



class ChomskySatzGenerator:

	def __init__(self, plain=False):
		if plain:
			self.satzType = MyChomskySatz
		else:
			self.satzType = ChomskySatz
		self.prepare()

	def generate(self):
		return self.satzType()

	# COULD ALSO USE pattern-en TO PLURALIZE!!
	def plural(self, word):
	    """
	    Converts a word to its plural form.
	    """
	    # if word in c.PLURALE_TANTUMS:
	    #     # defective nouns, fish, deer, contents, etc
	    #     return word
	    # elif word in c.IRREGULAR_NOUNS:
	    #     # foot->feet, person->people, etc
	    #     return c.IRREGULAR_NOUNS[word]
	    # el
	    if word.endswith('fe'):
	        # wolf -> wolves
	        return word[:-2] + 'ves'
	    elif word.endswith('f'):
	        # knife -> knives
	        return word[:-1] + 'ves'
	    elif word.endswith('o'):
	        # potato -> potatoes
	        return word + 'es'
	    elif word.endswith('us'):
	        # cactus -> cacti
	        return word[:-2] + 'i'
	    elif word.endswith('on') and word != 'dragon':
	        # criterion -> criteria
	        return word[:-2] + 'a'
	    elif word.endswith('um'):
	    	return word[:-2] + 'i'
	    elif word.endswith('y'):
	        # community -> communities
	        return word[:-1] + 'ies'
	    elif word[-1] in 'sx' or word[-2:] in ['sh', 'ch']:
	        return word + 'es'
	    elif word.endswith('an'):
	        return word[:-2] + 'en'
	    else:
	        return word + 's'

	def prepare(self):
		for verb in wn.all_synsets('v'):
			for lemma in verb.lemmas():
				if 1 in lemma.frame_ids():
					for lemma in verb.lemmas():
						#print lemma.name()
						#print (lemma, lemma.frame_ids(), "|".join(lemma.frame_strings()))
						#print verb.frame_strings()
						verbs.append(str(lemma.name()).replace('_', ' '))
		#print verbs

		for noun in wn.all_synsets('n'):
			#print noun
			for lemma in noun.lemmas():
				#print lemma.name()
				nouns.append(self.plural(str(lemma.name()).replace('_', ' ')))
		#print nouns

		for adj in wn.all_synsets('a'):
			#print adj
			for lemma in adj.lemmas():
				#print lemma.name()
				adjectives.append(str(lemma.name()).replace('_', ' '))

		for adv in wn.all_synsets('r'):
			#print adv
			for lemma in adv.lemmas():
				#print lemma.name()
				adverbs.append(str(lemma.name()).replace('_', ' '))
		#print adverbs




class Particle:
	def __init__(self, aType, word):
		self.type = aType;
		self.word = word;


class ChomskySatz:

	def __init__(self):
		self.article = self.randomWord(articles)
		self.adjective1 = self.randomWord(adjectives)
		self.adjective2 = self.randomWord(adjectives)
		self.noun = self.randomWord(nouns)
		self.verb = self.randomWord(verbs)
		self.adverb = self.randomWord(adverbs)

		

	def parse(self):
		sentence = ' '.join([self.article, self.adjective1, self.adjective2, self.noun, self.verb, self.adverb])
		if sentence[0] == ' ':
			sentence = sentence[1:]
		return sentence

	def randomWord(self, wordList):
		searchingForWord = True
		while (searchingForWord):
			num = random.randint(0, len(wordList) - 1)
			word =  wordList[num]
			isCommon = commonWord(word)
			#print word + " is common word " + str(isCommon)
			if isCommon:
				searchingForWord = False
		return word


class MyChomskySatz (ChomskySatz):
	def __init__(self):
		ChomskySatz.__init__(self)
		self.article = self.randomWord(myArticles)
		self.adjective1 = self.randomWord(myAdjectives)
		self.adjective2 = self.randomWord(myAdjectives)
		self.noun = self.randomWord(myNouns)
		self.verb = self.randomWord(myVerbs)
		self.adverb = self.randomWord(myAdverbs)





if __name__ == "__main__":
	# s = ChomskySatz()
	# print s.parse()

	g = ChomskySatzGenerator()
	sentence = g.generate()
	sentence = sentence.parse()
	print sentence[0].upper() + sentence[1:]

	

	# f = ChomskySatzGenerator(True)
	# print f.generate().parse()


	#print wn.synsets('dog')
	#print wn.synset('dog.n.01')
	#"Somebody %s something" is the frame string I want


