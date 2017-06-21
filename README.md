# PHP-Maze
在地圖或迷宮裡面，走訪每一個地方，不會走回頭路，自行閃避不可通行的地方，直到抵達終點。

## 條件
1. 基於 PHP5
2. MVC 架構下
3. 不能使用 Framework

## 執行條件
1. 記憶體 1 GB
2. Timeout 限制為 5 秒

## 定義
0: 代表可通行
1: 代表不可通行
2: 代表起點
3: 代表終點

## Version 1.0 (2017-06-19 新增)
1. 透過 DFS (Depth-First-Search) 來走訪地圖。
2. 會自行閃避不可通行的地方，也不會超出地圖，直到抵達終點。
3. 目前沒有最佳解。

![Result 01](https://github.com/telunyang/PHP-Maze/blob/master/images/01.png)
![Result 02](https://github.com/telunyang/PHP-Maze/blob/master/images/02.png)
![Result 03](https://github.com/telunyang/PHP-Maze/blob/master/images/03.png)
![Result 04](https://github.com/telunyang/PHP-Maze/blob/master/images/04.png)
![Result 05](https://github.com/telunyang/PHP-Maze/blob/master/images/05.png)
![Result 06](https://github.com/telunyang/PHP-Maze/blob/master/images/06.png)
![Result 07](https://github.com/telunyang/PHP-Maze/blob/master/images/07.png)
![Result 08](https://github.com/telunyang/PHP-Maze/blob/master/images/08.png)
![Result 09](https://github.com/telunyang/PHP-Maze/blob/master/images/09.png)

## Version 1.1 (開發中)