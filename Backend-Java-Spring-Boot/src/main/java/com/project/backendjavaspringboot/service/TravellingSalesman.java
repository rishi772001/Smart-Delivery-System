package com.project.backendjavaspringboot.service;

import java.util.ArrayList;

public class TravellingSalesman {
    private int cities;
    private int[][] distance;
    private boolean[] visited;
    private int start;
    public int minDistance = Integer.MAX_VALUE;
    private ArrayList<Integer> minPath = new ArrayList<>();

    public TravellingSalesman(int cities){
        this.cities = cities;
        distance = new int[cities][cities];
        visited = new boolean[cities];
    }

    public void addDistance(int cityA, int cityB, int distance){
        this.distance[cityA][cityB] = distance;
    }

    private void findPathUtil(int start, ArrayList<Integer> path, int dist){

        if(path.size() == cities)
        {
            int temp = dist + distance[start][this.start];
            if(minDistance > temp) {
                minDistance = temp;
                minPath = (ArrayList<Integer>) path.clone();
                minPath.add(this.start);
            }
            return;
        }

        if(visited[start])
            return;

        path.add(start);
        visited[start] = true;
        for(int i = 0; i < cities; i++){
            if(i == start)
                continue;
            findPathUtil(i, path, dist + distance[start][i]);
        }
        visited[start] = false;
        path.remove(path.size() - 1);
    }

    public ArrayList<Integer> findPath(int start){
        this.start = start;
        findPathUtil(start, new ArrayList<>(), 0);
        return this.minPath;
    }

}
