/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author G26
 */
public class program105 {
    public static void main(String[] args)
   {      int total, value1 = 20, value2 = 40;
      
      // Call the sum method, passing the contents of  value1 and value2 as arguments. Assign the
      // return value to the total variable.
      total = sum(value1, value2);
        // Display the contents of all these variables.
      System.out.println("The sum of " + value1 +  " and " + value2 + " is " +    total);   }
   
   /**      The sum method returns the sum of its two parameters.
      @param num1 The first number to be added.      @param num2 The second number to be added.
      @return The sum of num1 and num2.   */
      public static int sum(int num1, int num2)
   {      int result;  // result is a local variable
      // Assign the value of num1 + num2 to result.
      result = num1 + num2;      
      // Return the value in the result variable.
      return result;  }  

}
