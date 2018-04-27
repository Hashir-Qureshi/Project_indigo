/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import javax.swing.JOptionPane;

/**
 *
 * @author G26
 */
public class Prog91 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       int num, w, sum;
        w = 1;
        sum = 0;
        do {
            num=Integer.parseInt(JOptionPane.showInputDialog("Enter 5 numbers"));
            if (num%2!=0)
                sum = sum + num;
            w++;
        } while (w<=5);
        JOptionPane.showMessageDialog(null," The sum of the odd numbers in the list is " + sum);
    }
    
}

