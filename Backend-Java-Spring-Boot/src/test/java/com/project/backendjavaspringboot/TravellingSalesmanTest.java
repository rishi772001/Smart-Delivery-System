package com.project.backendjavaspringboot;

import com.project.backendjavaspringboot.service.TravellingSalesman;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;

import java.util.ArrayList;
import java.util.Arrays;

public class TravellingSalesmanTest {
    public int[] verifyUtil(int[][] arr){
        TravellingSalesman tsp = new TravellingSalesman(arr.length);

        for(int i = 0; i < arr.length; i++){
            for(int j = 0; j < arr.length; j++){
                tsp.addDistance(i, j, arr[i][j]);
            }
        }

        ArrayList<Integer> list = tsp.findPath(0);
        int[] listToArr = new int[list.size()];

        for(int i = 0; i < list.size(); i++){
            listToArr[i] = list.get(i);
        }


        System.out.println(tsp.minDistance);
        System.out.println(Arrays.toString(listToArr));
        return listToArr;
    }

    @Test
    public void verify(){

        int[][] arr = {{ 0, 10, 15, 20 },
                        { 10, 0, 35, 25 },
                        { 15, 35, 0, 30 },
                        { 20, 25, 30, 0 }};

        int[][] arr1 = {
                {0,4,1,3},
                {4,0,2,1},
                {1,2,0,5},
                {3,1,5,0}
        };

        Assertions.assertArrayEquals(verifyUtil(arr), new int[]{0, 1, 3, 2, 0});
        Assertions.assertArrayEquals(verifyUtil(arr1), new int[]{0, 2, 1, 3, 0});
    }
}
