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
public class Prog93 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       int num, w, counter;
        w = 1;
        counter = 0;
        do {
            num=Integer.parseInt(JOptionPane.showInputDialog("Enter 5 numbers"));
            if (num==99)
                counter++;
            w++;
        } while (w<=5);
        JOptionPane.showMessageDialog(null," There is/are " + counter + " 99's in the list");
    }
    
}
        
