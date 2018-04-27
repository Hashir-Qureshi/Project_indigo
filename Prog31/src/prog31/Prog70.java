/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import javax.swing.JOptionPane;

/**
 *
 * @author Anwar Family
 */
public class Prog70 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
 int num, w, sum;
        for (w=1, sum=0;w<=5;w++) {
                                    num=Integer.parseInt(JOptionPane.showInputDialog("Enter the list"));
                                    if (num%2!=0)
                                        sum = sum + num;
        }
        JOptionPane.showMessageDialog(null," The sum of the odd numbers in your list is " + sum);
    }
    
}