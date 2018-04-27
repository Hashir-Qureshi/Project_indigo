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
public class Prog92 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
      int num, w;
        w = 1;
        do {
            num=Integer.parseInt(JOptionPane.showInputDialog("Enter 5 numbers"));
            if (w==1)
                JOptionPane.showMessageDialog(null," The first number is " + num);
            if (w==5)
                JOptionPane.showMessageDialog(null," The last number is " + num);
            w++;
        } while (w<+5);
    }
    
}
