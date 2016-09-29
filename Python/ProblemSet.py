import math

def hypot(b, h):
    return (b*h)/2

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
def double(s1):
    return list(map(lambda x: x*2,s1))
def noduplicate(s1):
    return set(s1)
translator = {"99":"Neunundneunzig","red":"rot","balloons":"Luftballon"}
def translation(s1):
    return map(lambda x: translator[x],s1)

#SUMPRODUCT
def sumprod(s1,func):
    return map(func,s1)
def summify(list1):
    intlist = [int(x) for x in list1]
    return sum(intlist)
def productify(list1):
    return reduce(lambda x, y: int(x)*int(y), list1)
#######################
sumProductNums = raw_input("SumProduct Numbers: ").split(" ")
print(sumprod(sumProductNums,summify))
print(sumprod(sumProductNums,productify))
"""
translateString = raw_input("String to translate: ").split(" ")
print(translation(translateString))

duplicate1 = raw_input("Remove Duplicate List: ").split(" ")
print(noduplicate(duplicate1))

double1 = raw_input("Doubles/duplicate List: ").split(" ")
print(duplicate(double1))
print(double([int(x) for x in double1]))

list1 = raw_input("Dot Product List 1: ")
list2 = raw_input("Dot Product List 2: ")
print(dotprod(list(map(int,list1.split(" "))),list(map(int,list2.split(" ")))))

def tester():
b = input("Base for Hypotenuse: ")
h = input("Height for Hypotenuse: ")
print(hypot(b,h))

r = input("Sphere Radius: ")
print(radius(r))

t = input("Water Temperature ")
print(water(t))
"""

    #return "all finished"
#print(tester())
