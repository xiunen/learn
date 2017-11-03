#include <stdio.h>
 
int find_set(int n, int arr[n], int m){
    while(m!=arr[m])m=arr[m];
    return m;
}

void init_arr(int n, int arr[n]){
    for(int i = 0; i < n; i++){
        arr[i] =  i;
    }
}

int searc_node(int n, int arr[n], int m){
    int x = find_set(n, arr, m);
    int ret = 0;
    for(int i = 0; i < n; i ++){
        if(x == find_set(n,arr,i))ret ++;
    }
    return ret;
}

void init_arr_with_value(int n, int arr[n], int value){
    for(int i = 0; i < n; i++){
        arr[i] =  value;
    }
}



int main(){
    int n,q,n1,n2;
    char c;
    scanf("%d %d", &n, &q);
    int arr[n], count[n];
    init_arr(n, arr);
    init_arr_with_value(n,count,1);
    while(q -- > 0){
        scanf(" %c",&c);
        if('Q' == c){
            scanf("%d", &n1);
            int p = find_set(n, arr, n1-1);
            printf("%d\n", count[p]);
        }else if('M' == c){
            scanf("%d", &n1);
            scanf("%d", &n2);
            int n2_p = find_set(n,arr,n2-1);
            int n1_p = find_set(n, arr, n1-1);
            if(arr[n2_p] != n1_p){
                count[n1_p]+=count[n2_p];
                arr[n2_p] = n1_p;
            }
        }
    }
    return 0;
}

