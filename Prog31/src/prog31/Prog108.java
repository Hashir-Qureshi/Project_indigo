/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Class
 */
public class Prog108 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // Declare a 2D array with 3 rows and 4 columns.
        int[][] numbers = {
                            {1, 2, 3, 4}, 
                            {5, 6, 7, 8}, 
                            {9, 10, 11, 12}
                            };
        
        //Display the number of each rows.
        System.out.println("The number of " +"rows is " +numbers.length);
        //Display the number of columns in each row.
        for (int index = 0; index< numbers.length; index++)
        {
            System.out.println("The number of " +"columns in row " +index+"is" +numbers[index].length 
                                +" and the row index is "+numbers[index]);
            for(int colIndex=0; colIndex <numbers[index].length;colIndex++){
                System.out.println("The number in the  column is " +numbers[index][colIndex]);
                }
    }
    
}
}