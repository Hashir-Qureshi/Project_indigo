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
public class Prog71 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
int num, w;
        for (w=1;w<=5;w++) {
                            num=Integer.parseInt(JOptionPane.showInputDialog("Enter 5 numbers"));
                            if (w==1)
                                JOptionPane.showMessageDialog(null," Your first number is " + num);
                            if (w==5)
                                JOptionPane.showMessageDialog(null," You last number is " + num);
        }
    }
    
}
