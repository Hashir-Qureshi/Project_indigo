/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import javax.swing.JOptionPane;

/**
 *
 * @author Class
 */
public class Prog18 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        String value;
        value = JOptionPane.showInputDialog("Enter a value");
        String answer;
        answer="The value is "+value;
        JOptionPane.showMessageDialog( null, answer );
        System.exit(0);
    }
    
}
