/*http://poj.org/problem?id=1004*/
#include <stdio.h>

int main(){
    int i = 0;
    float a, sum = 0;
    while(i < 12){
        scanf("%f",&a);
        sum += a;
        i ++;
    }
    printf("$%.2f", sum/i);
    return 0;
}