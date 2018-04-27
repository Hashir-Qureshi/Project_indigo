/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;


import java.util.Scanner;
import javax.swing.JOptionPane;

/**
 *
 * @author Anwar Family
 */
public class Prog20 {

    /**
     * @param args the command line arguments
     */
    
    public static void main(String[] args) {
       int a,b;
	a = Integer.parseInt(JOptionPane.showInputDialog("Enter value for a"));
	b = Integer.parseInt(JOptionPane.showInputDialog("Enter value for b"));
        
	
        
        if ( a > b ) {
            JOptionPane.showMessageDialog(null, a + " is larger than " + b);
        } 
        
        if ( b > a ) {
            JOptionPane.showMessageDialog(null, b + " is larger than " + a);
        }
        
        if ( a == b ) {
            JOptionPane.showMessageDialog(null, "Both numbers are equal.");
	
            
            
      
            }
      }
}
    
    


