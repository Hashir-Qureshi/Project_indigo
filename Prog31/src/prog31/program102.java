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
public class program102 {
    public static void main(String[] args)    {
            String name = "Shakespeare";
            // Display the String referenced by the name variable.
      System.out.println("In main, the name is " +   name);
           changeName(name);
            // Display the String referenced by the name variable.
      System.out.println("Back in main, the name is " +   name);
   }
      /**      The changeName method accepts a String as its argument
      and assigns the str parameter to a new String.
     * @param str comments go here*/
    
     public static void changeName(String str)
   {
      // Create a String object containing "Dickens".
      // Assign its address to the str parameter variable.
      str = "Dickens";
            // Display the String referenced by str.
      System.out.println("In changeName, the name " +
                         "is now " + str);
      
   }

    
}
