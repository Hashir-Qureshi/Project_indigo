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
public class Prog51 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, counter;
        w = 1;
        counter = 0;
        Scanner a = new Scanner(System.in);
        
        //System.out.println("Enter the list");
        while(w<=5) {
            num = Integer.parseInt(JOptionPane.showInputDialog(null, 
            "Enter the list",
            "Odd Number Checklist", 
                    JOptionPane.QUESTION_MESSAGE));
            if(num==99)
                counter++;
            w++;
        }
         JOptionPane.showMessageDialog(null," There is/are " +counter+ " 99 in the list");   
        }
    }
