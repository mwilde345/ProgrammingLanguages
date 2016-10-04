import math
import operator

def hypot(b, h):
    return math.sqrt(b**2+h**2)

def radius(r):
    return ((4*math.pi)/3)*r**3

def water(t):
    if 32<t<212:
        a="liquid"
    elif t<=32:
        a="solid"
    else:
        a="gas"
    return a
def dotprod(s1,s2):
    dotProduct= sum(i[0] * i[1] for i in zip(s1,s2))
    return dotProduct
def duplicate(s1):
    return [x+" "+x for x in s1]
def doubleIt(s1):
    return list(map(lambda x: x*2,s1))
def noduplicate(s1):
    return set(s1)
translator = {"99":"Neunundneunzig","balloons":"Luftballon","red":"rot"}
def translation(s1):
    return map(lambda x: translator[x],s1)
def sumprod(s1,oper):
    return reduce(lambda x,y: oper(x,y), s1)
def articles(s1):
    return filter(lambda s: s.lower() in ['a','an','the'],s1)
def colors(s1):
    return filter(lambda s: s.lower() in list(('black','brown', 'blue', 'red', 'yellow', 'orange', 'purple', 'green', 'gray', 'pink')),s1)
def positives(s1):
    return filter(lambda s: s>0,s1)
def getmax(s1):
    return max(s1)
def squareNums(x):
    return filter(lambda x: x!=0,[x**2 for x in range(x+1)])
def getYoungest(personList):
    compare = lambda a,b: a[0] if (a[1]<b[1]) else b[0]
    return reduce(compare,personList)

def tester():
    #colorList = raw_input("Color List: ").split(" ")
    #print(colors(colorList))
    #positiveList = [float(x) for x in raw_input("Pos List: ").split(" ")]
    #print(positives(positiveList))
    #maxList = [float(x) for x in raw_input("Max List: ").split(" ")]
    #print(getmax(maxList))
    #rangeNum = input("Square Number: ")
    #print(squareNums(rangeNum))
    """ bob = dict([('name',"Bob"),('age',27)])
        bob2 = dict([('name',"Bob's Brother"),('age',26)])
        bob3 = dict([('name',"Bob Jr"),('age',3)])

        b = input("Base for Hypotenuse: ")
        h = input("Height for Hypotenuse: ")
        print(hypot(b,h))

        r = input("Sphere Radius: ")
        print(radius(r))

        t = input("Water Temperature ")
        print(water(t))

        sumProductNums = [int(x) for x in raw_input("SumProduct Numbers: ").split(" ")]
        print(sumprod(sumProductNums,operator.add))
        print(sumprod(sumProductNums,operator.mul))

        translateString = raw_input("String to translate: ").split(" ")
        print(translation(translateString))

        duplicate1 = raw_input("Remove Duplicate List: ").split(" ")
        print(noduplicate(duplicate1))

        double1 = raw_input("Doubles/duplicate List: ").split(" ")
        print(duplicate(double1))
        print(doubleIt([int(x) for x in double1]))
        list1 = raw_input("Dot Product List 1: ")
        list2 = raw_input("Dot Product List 2: ")
        print(dotprod(list(map(int,list1.split(" "))),list(map(int,list2.split(" ")))))

        articleString = raw_input("Article String: ").split(" ")
        print(articles(articleString))
    """
    b=("Bob",27)
    b2=("Bob's Bro",26)
    b3=("Bob Jr.",3)
    print(getYoungest([b,b2,b3]))
    return "all finished"

print(tester())
