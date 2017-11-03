#include <stdio.h>
int main(){
    int n, sum = 0,b, i;
    scanf("%d",&n);
    for(i =0;i<n;i++){
        scanf("%d",&b);
        sum += b;
    }
    printf("%d", sum);
    return 0;
}