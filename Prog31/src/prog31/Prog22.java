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
public class Prog22 {

    /**
     * @param args the command line arguments
     */
    
    public static void main(String[] args) {
        int 
        a = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for a")),
        b = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for b"));
        
        if ( a > b ) 
            JOptionPane.showMessageDialog(null, a + " is larger than " + b);
	else if ( b > a ) 
            JOptionPane.showMessageDialog(null, b + " is larger than " + a); 
	else if ( a == b ) 
            JOptionPane.showMessageDialog(null, "Both numbers are equal.");
    }
}


       