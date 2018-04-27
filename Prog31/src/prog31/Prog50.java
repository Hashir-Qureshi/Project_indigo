/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import javax.swing.JOptionPane;

/**
 *
 * @author Class
 */
public class Prog50 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        double num, w;
        w = 1;
       
       System.out.println("Enter a list");
       
       while (w<=5){
       num = Integer.parseInt(JOptionPane.showInputDialog(null, 
            "Enter the list",
            "Odd Number Checklist", 
                    JOptionPane.QUESTION_MESSAGE));
        if(w==1)
            JOptionPane.showMessageDialog(null," the first number is " +num);
               
        if(w==5)
            JOptionPane.showMessageDialog(null," the last number is " +num);
               
        w++;
    }
    }
}