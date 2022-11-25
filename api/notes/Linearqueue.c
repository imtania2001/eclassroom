#include<stdio.h>
#include<stdlib.h>
#include<ctype.h>
#define size 5
typedef struct queue{
int front,rear;
int arr[size];
}queue;
int isEmpty(queue q)
{
if(q.front== -1 && q.rear== -1)
return 1;
else
return 0;
}
int isFull(queue q)
{
if(q.front== 0 && q.rear== size-1)
return 1;
else
return 0;
}
void enqueue(queue *q,int val)
{
int i,j=0;
if(q->rear == -1) //if queue is empty
q->front=q->rear=0;
else if(q->rear == size-1){ //if rear is at end but queue is not full
for(i=q->front;i<size;i++)
q->arr[j++]=q->arr[i];
q->front=0;
q->rear=j;
}
else
q->rear++; //incrementing rear by 1
q->arr[q->rear]=val; //insertion at rear
printf("Enqueued element:%d\n",val);
}
int dequeue(queue *q)
{
int temp=q->arr[q->front];
if(q->front==q->rear) //only one element in queue
q->front=q->rear=-1;
else
q->front++;
return temp;
}
void main()
{
queue q;
q.front=-1;
q.rear=-1;
q.arr[size];
int n,ch,val;
while(1)
{
system("cls");
printf("ENTER 1 TO ENQUEUE\n" "ENTER 2 TO DEQUEUE\n");
 
printf("ENTER YOUR CHOICE:");
scanf("%d",&ch);
switch(ch)
{
case 1: 
if(isFull(q))
printf("Queue Overflow");
else
{
printf("Enter the value you want to Enqueue");
scanf("%d",&val);
enqueue(&q,val);
}
break;
case 2:
if(isEmpty(q))
printf("Queue Underflow");
else
{
n=dequeue(&q);
printf("Dequeued:%d",n);
}
break;
default:
printf("Wrong Choice");
}
getch();
}
}
