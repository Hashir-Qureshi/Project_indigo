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
public class Prog24 {

    /**
     * @param args the command line arguments
     */
    static Scanner x = new Scanner (System.in);
    public static void main(String[] args) {
   
        int 
        a = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for a")),
        b = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for b")),
	c = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for c"));
	
	if (a>b){
		if (a>c)
			JOptionPane.showMessageDialog(null, a + "is the largest");
		else
			JOptionPane.showMessageDialog(null, b + "is the largest"); }
	else if (b > c)
		JOptionPane.showMessageDialog(null, b + "is the largest");
	else 
		JOptionPane.showMessageDialog(null, c + "is the largest");
   }
}
