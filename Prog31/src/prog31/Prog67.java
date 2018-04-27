/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author Anwar Family
 */
public class Prog67 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
         int num;
         boolean flag = false;
    Scanner a = new Scanner(System.in);
    
    System.out.println("Enter the list");
         for (int counter=1; counter<=5; counter++){
            num = a.nextInt();
             
            
            if(num==99)
                  flag=true;
              
              if (flag)
                  System.out.println("The number 99 exists ");
              else
                  System.out.println("The number 99 does not exist");
    }
    
}
}