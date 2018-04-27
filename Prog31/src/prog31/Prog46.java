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
public class Prog46 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w;
        w = 1;
        
        boolean flag;
            flag=false;
          Scanner a = new Scanner(System.in);
          
          System.out.println("Enter the list");
          while (w<=5){
              num = a.nextInt();
              
              if(num==99)
                  flag=true;
              w++;
              if(flag)
                  System.out.println("The number 99 exists ");
              else
                  System.out.println("The number 99 does not exist");
          }
    
}
}
