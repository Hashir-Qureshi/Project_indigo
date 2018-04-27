/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;
import javax.swing.JOptionPane;
/**
 *
 * @author G23
 */
public class Prog28 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
         int 
        a = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for a")),
        b = Integer.parseInt(JOptionPane.showInputDialog("Enter a value for b"));

	if (a==0){
		if (b==0){
			JOptionPane.showMessageDialog(null, "All solutions");
		} else {
			JOptionPane.showMessageDialog(null, "No solutions");
		}
	} else{
 		JOptionPane.showMessageDialog(null, "One solution");
		int x = -b/a;
		JOptionPane.showMessageDialog(null, x); }
     }
}