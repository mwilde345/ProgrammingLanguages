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
  (append-map(lambda (s)
        (list s s))
      list1))

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



(define (sum list1) (apply + list1))
(define (product list1) (apply * list1))

(define-struct student (name age))
(define student1 (make-student "Tim J."  30))
(define student2 (make-student "Uncle J."  34))
(define student3 (make-student "Baby J."  12))
(define student4 (make-student "Grandpa J."  66))
(define student5 (make-student "Old Man J."  3340))

(define (getyoungest studentList)
  (student-name (car (sort studentList #:key student-age <))))

(define deepList (list 1 2 (list 2 (list "fear") )))
(define (listrec dream idea level)
  (display dream)
  (newline)
  (cond
    ((empty? dream) "not Found")
    ((member idea dream) level)
    ((list? (first dream)) (listrec (first dream) idea (+ level 1)))
    (else (listrec (rest dream) idea level))
  ))


(define (Tester)
  (values
   (hypotenuse 10 12.5)
   (volume 3.4)
   (waterstate 212.1)
   (dotproduct (vector 1 2 3) (vector -2 400 6000))
   (doubled (list -.4 1 2000))
   (duplicate '(3 6 -1233))
   (nodupl '(3 2 a 4 3 100 .5 ad 9 2 100))
   (translate '("one" "two" "five" "four" "three"))
   (sumProduct '(2 4 6) product)
   (articles '("two" "an" "the" "with" "when" "a" "the" "an" "the" "a"))
   (colors '("gray" "fox" "orange" "apple"))
   (positives '(1 4 -2 1 10000 3 -3440 -3 .5))
   (getmax '(1 -3 200 -2032.4))
   (squarenums 7)
   (listrec deepList "fear" 1)
   ;(procedure-arity younger?)
   ;(getyoungest)
   (getyoungest (list student1 student2 student3 student4 student5))
   ))

(Tester)