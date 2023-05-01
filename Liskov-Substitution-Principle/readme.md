# Liskov's Substitution Principle

- Stricter rules (normal types) 
- Subtype must abide by those rules
- Stronger rules apply to children (when overriding parent functionality)

## 5 Rules

- Child function arguments must match function arguments of parent
- Child function return type must match parent function return type
- Child pre-conditions cannot be greater than parent function pre-conditions
- Child post-conditions cannot be lesser than parent function post-conditions
- Exception thrown by child method must be the same as or inherit from an exception thrown by the parent method

