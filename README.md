## KATA BOOLEAN CALCULATOR DANIELESAULSCILLIA - PHP VERSION

Implement a Boolean calculator that gets a string as input and evaluates it to the Boolean result.

Specifications:

- support single values: 
    - "TRUE" => true
    - "FALSE" => false
- support the NOT operator:
    - "NOT TRUE" => false
- support the AND operator:
    - "TRUE AND FALSE" => false
    - "TRUE AND TRUE" => true
- support the OR operator:
    - "TRUE OR FALSE" => true
    - "FALSE OR FALSE" => false
- support any number of AND and OR, giving precedence to NOT then AND and, eventually, the OR operator
    - "TRUE OR TRUE OR TRUE AND FALSE" => true
    - "TRUE OR FALSE AND NOT FALSE" => true
- support parentheses:
    - "(TRUE OR TRUE OR TRUE) AND FALSE" => false
    - "NOT (TRUE AND TRUE)" => false
    
BONUS: Prints the Abstract Syntax Tree representing the calculation.

es: "(TRUE OR TRUE OR TRUE) AND FALSE" returns: 

AND
 | _ OR
 |   | _ TRUE
 |   | _ OR
 |       | _ TRUE
 |       | _ TRUE
 | _ FALSE