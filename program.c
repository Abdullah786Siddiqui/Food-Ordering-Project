// Question 1

// Write a C program that defines a function int sum(int a, int b) which takes two integer
// arguments and returns their sum.

// int sum(int a, int b)
// {
//   return a + b;
// }
// int main()
// {
//   int x, y;
//   printf("Enter First Integer: ");
//   scanf("%d", &x);
//   printf("Enter Second Integer: ");
//   scanf("%d", &y);
//   int result = sum(x, y);
//   printf("The sum of two Number : %d", result);
// }


// Question 2

// Define a function float calculateAverage(int x, int y, int z) that returns the average of
// three integers as a float.

// float Avg(int a, int b, int c) {
//     return (a + b + c) / 3.0f;
// }

// int main() {
//     int x, y, z;
//     printf("Enter three integers: ");
//     scanf("%d %d %d", &x, &y, &z);

//     printf("The average is: %.5f\n", Avg(x, y, z));
// }


// Question 3

// Define a function int maxNo(int x, int y, int z) that returns the maximum of three
// integers as an integer.

// float maxNo(int a, int b, int c) {
//     int max = a;
//     if(b > max) return max = b;
//     if(c > max) return  max = c;
//     return max;
    
// }

// int main() {
//     int x, y, z;
//     printf("Enter three integers: ");
//     scanf("%d %d %d", &x, &y, &z);

//     printf("The Maximum of Three Number is: %d\n", maxNo(x, y, z));
// }


// Question 4

// Write a C program that defines a function int product(int a, int b) which takes two
// integer arguments and returns their product.

// int product(int a, int b) {
//     return a * b;
    
// }

// int main() {
//     int x, y;
//     printf("Enter two integers: ");
//     scanf("%d %d", &x, &y);

//     printf("The Product of two Number is: %d\n", product(x,y));
// }


// Recursive Function in C

// A recursive function is a function that calls itself to solve a smaller version of a problem. Recursion works by dividing a problem into simpler sub-problems until it reaches a point where it can stop.

// There are two important parts of a recursive function:

// Base Case:

// This is the stopping condition for the recursion.

// Without a base case, recursion would go on forever and crash the program.

// Recursive Case:

// This is where the function calls itself with a smaller or simpler input.

// The recursion continues until the base case is reached.

// Example: Factorial of a number n

// int factorial(int n) {
//     if (n == 0)           // base case
//         return 1;
//     else
//         return n * factorial(n - 1); // recursive case
// }
