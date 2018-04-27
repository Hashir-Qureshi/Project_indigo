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
public class Prog26 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int 
        x = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for x")),
        y = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for y")),
	z = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for z"));
	
	if (x==y){
		JOptionPane.showMessageDialog(null, "equal");
		JOptionPane.showMessageDialog(null, x); }
	else if (x==y){
		z= 6;
		JOptionPane.showMessageDialog(null, z);}
	else 
		JOptionPane.showMessageDialog(null,"wow");
   }
}


