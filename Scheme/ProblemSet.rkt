#lang scheme

(define hypotenuse
  (lambda (x y)
  (sqrt (+ (expt x 2) (expt y 2)))))
(define (volume x)
  (* (/ 4 3) 3.14 (expt x 3)))
(define (waterstate temp)
  (cond ((<= temp 32) 'solid)
        ((<= temp 212) 'liquid)
	(else 'gas)))
(define (dotproduct list1 list2)
  (apply + (vector->list (vector-map * list1 list2)))
   )
(define (duplicate list1)
  (map (lambda (a)
         (string-append a a))
       list1
  ))
(define (doubled numList)
  (map (lambda (a)
    (* a 2))
       numList))
(define (nodupl list1)
  (remove-duplicates list1))

(define dict (make-hash))
(hash-set! dict "one" 'eins)
(hash-set! dict "two" 'zwei)
(hash-set! dict "three" 'drei)
(hash-set! dict "four" 'vier)
(hash-set! dict "five" 'fuenf)

(define (translate wordlist)
  (map (lambda (s)
         (hash-ref dict s))
    wordlist))

(define (sumProduct numList func)
  (func numList))

(define (articles wordlist)
  (count string? (filter checkarticle wordlist)))
(define (checkarticle s)
  (member s '("a" "an" "the")))

(define (colors wordlist)
  (filter checkcolors wordlist))
(define (checkcolors c)
  (member c '("black" "brown" "blue" "red" "yellow" "orange" "purple" "green" "gray" "pink")))

(define (positives numList)
  (filter positive? numList))

(define (getmax numList)
  (apply max numList))

(define (squarenums x)
  (define mylist (build-list (+ x 1) (lambda (y) (* y y))))
  (remove 0 mylist))

(define (getyoungest guylist)
  (define (firstage)
    (send (car guylist) getage))
  (filter (< firstage (getyoungest (cdr (guylist))))))


(define (sum list1) (apply + list1))
(define (product list1) (apply * list1))
(define person%
  (class object%
    (init age name)
    (super-new)
    (define theage age)
    (define thename name)
    (define/public (get-age) theage)
    (define/public (getname) thename)
    ))
(define guy1 (new person% [age 50] [name "joe"]))
(define guy2 (new person% [age 51] [name "Sam"]))
(define guy3 (new person% [age 52] [name "tim"]))
(define guy4 (new person% [age 535] [name "bob"]))
(define guy5 (new person% [age 5] [name "steve"]))


;deep list recursion
;(+ (my-sum (car lst)) (my-sum (cdr lst)))


(define (Tester)
  (values
   (hypotenuse 10 12.5)
   (volume 3.4)
   (waterstate 212.1)
   (dotproduct (vector 1 2 3) (vector -2 400 6000))
   (doubled (list -.4 1 2000))
   (duplicate '("3" "6" "-1233"))
   (nodupl '(3 2 a 4 3 100 .5 ad 9 2 100))
   (translate '("one" "two" "three" "four" "five"))
   (sumProduct '(2 4 6) product)
   (articles '("two" "an" "the" "with" "when" "a" "the" "an" "the" "a"))
   (colors '("gray" "fox" "orange" "apple"))
   (positives '(1 4 -2 1 10000 3 -3440 -3 .5))
   (getmax '(1 -3 200 -2032.4))
   (squarenums 7)
   (getyoungest '(guy1 guy2 guy3 guy4 guy5))
   ))

(Tester)