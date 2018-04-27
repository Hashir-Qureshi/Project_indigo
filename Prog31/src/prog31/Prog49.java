/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import javax.swing.JOptionPane;
public class Prog49 {


    public static void main(String[] args) {
         double num, sum = 0, w = 1;

        

         while ( w<=5){
            num = Integer.parseInt(JOptionPane.showInputDialog(null, 
            "Enter the list",
            "Odd Number Checklist", 
                    JOptionPane.QUESTION_MESSAGE));
            if (num%2!=0)
                 
                sum+= num;
                    
                w++;

             
         }
        
                JOptionPane.showMessageDialog(null," the sum of odd is " +sum);

    }
    
}