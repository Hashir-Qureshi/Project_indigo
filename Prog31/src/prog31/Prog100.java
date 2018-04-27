/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Class
 */
public class Prog100 {
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) 
    {  int x = 10;
            System.out.println("I am passing value to displayValue.");
        displayValue(5);
        displayValue(x);
        displayValue(x*4);
        displayValue(Integer.parseInt("700"));
        
            System.out.println("Now I am back in main.");
    }
    public static void displayValue(int num)
    {System.out.println("The value is " +num);
}
}
